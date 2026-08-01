<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 0;
            padding: 0 20px;
            font-size: 10px;
            font-family: Arial, sans-serif;
            color: #555;
        }

        .footer {
            width: 100%;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
        
        .right {
            text-align: right;
        }
        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="footer">
        <table style="width: 100%;">
            <tr>
                <td width="50px" style="text-transform: uppercase">
                    {{ $company->name }}
                </td>
                <td>
                    <div class="center">
                        <div>{{ $company->website }} | {{ $company->email }} | {{ $company->telephone }}</div>
                        <div>NINEA: {{ $company->ninea }} | RC: {{ $company->rc }} | RIB: {{ $company->rib }}</div>
                    </div>
                </td>
                <td width="50px" class="right">
                    Page <span class="pageNumber"></span> / <span class="totalPages"></span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>