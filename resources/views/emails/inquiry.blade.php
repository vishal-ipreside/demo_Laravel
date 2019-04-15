<style type="text/css">
    body {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        margin: 0 !important;
        width: 100% !important;
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
        -webkit-font-smoothing: antialiased !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    p, h1, h2, ul, ol, li, div {
        margin: 0;
        padding: 0;
    }

    h1, h2 {
        font-weight: normal;
        background: transparent !important;
        border: none !important;
    }

    @media only screen and (max-width: 480px) {

    }

    @media only screen and (max-width: 540px) {

        td, table {
            vertical-align: top;
        }

        td.middle {
            vertical-align: middle;
        }

        img {
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
            width: auto;
            max-width: 100%;
            clear: both;
            display: block;
            float: none;
        }
    }
</style>

<table style="max-height: 100%; text-align: left; width: 100%;padding: 10%;">
    <tr>
        <td width="30%" align="Left">
            Email
        </td>
        <td width="70%" align="Left">
            {{$request->email}}
        </td>
    </tr>

    <tr>
        <td width="30%" align="Left">
            Your asked the question
        </td>
        <td width="70%" align="Left">
        {{$request->question}}.
        <td>
    </tr>
    <tr>
        <td colspan="2">
            Our specialists will get back to you soon
        </td>
    </tr>
</table>

