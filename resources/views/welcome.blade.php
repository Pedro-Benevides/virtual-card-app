<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Qr Code Gen</title>

    <!-- Styles -->
    <style>
        body {
            font-family: "Nunito";
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-inline div {
            display: flex;
            align-items: center;
        }

        .form-inline div label {
            margin: 5px 0 5px 0;
            width: 10%;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            padding: 10px;
            background-color: #80808063;
            font-weight: bold;
            font-family: monospace;
        }

        .form-inline div input {
            width: 90%;
            vertical-align: middle;
            margin: 5px 0 5px 0;
            padding: 11px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 0 5px 5px 0;
        }

        .form-inline button {
            width: 30%;
            padding: 10px 15px;
            background: #ddd0;
            border: 1px solid #00000052;
            border-radius: 5px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 800px) {
            .form-inline div input {
                margin: 10px 0;
            }

            .form-inline {
                flex-direction: column;
                align-items: stretch;
            }
        }

        .form-inline div.error-message {
            color: #f00;
            font-weight: bold;
            padding-top: 4px;
        }
    </style>
</head>

<body>

    <livewire:qr-code-generate></livewire:qr-code-generate>

    @livewireScripts
</body>

</html>