<?php

namespace App\Http\Controllers;

use App\Items;
use App\ItemType;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;

class QuestionController extends Controller
{
    //

    public function ask_question(Request $request,$id){
        $items = Items::find(decode($id));
        if(!$items){
            redirect()->route('items');
        }

        $data = array();
        if (!empty($request->all())) {
            $data = self::validatInquiry($request->all());
            view()->share('errors', $data->errors()->all());

            if (!$data->fails()) {
                $sendEmail = \Mail::send('emails.inquiry', ['request' => $request], function ($message) use ($request) {
                    $message->from(ADMIN_EMAIL, ADMIN_EMAIL_FROM_NAME);
                    $message->to($request->email);
                    $message->subject('Question Regarding Item');
                });
                $request->session()->flash('message', INQUIRY_SUCCESS);
                return redirect()->route('ask_question',$id);
            }
        }

        if(!empty($request->all())){
            view()->share(['data'=>$request->all()]);
        }

        return view('question');
    }


    protected function validatInquiry(array $data)
    {
        $validator = \Validator::make($data,
            [
                'email'     => 'required|email',
                'question'  => 'required|max:100',
            ],
            [
                'email.required'    => 'Email is required',
                'email.email'       => 'Email is invalid',
                'question.required' => 'Question is required',
                'question.max'      => 'Max 100 character allows',
            ]
        );

        return $validator;

    }
}
