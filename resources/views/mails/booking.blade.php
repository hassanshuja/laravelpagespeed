<body>
    
@foreach($data as $d)
    {{$d->gender==0?"Lieber Herr":"Liebe Frau"}} {{$d->last_name,"(n.d.)"}} 
    <p>Herzlichen Dank für Ihre Buchungsanfrage.</p> 

    <p>Ihre Reservationsanfrage wird geprüft. Die definitive Reservations-Bestätigung erhalten Sie spätestens innerhalb 24 Stunden.</p>
    <br>
    <hr>
    <p style='color:navy'>{{strtoupper($d->o_title)}}</p>
    <p>Ankunftsdatum: <b>{{\Carbon\Carbon::CreateFromTimeStamp($d->booking_date)->format('d.m.Y')}}</b></p>
    <p>Dauer:<b> {{$d->day}} {{$d->day>1"Tage":"Tag"}}, {{$d->night}}{{$d->night?>1"Nächte":"Nacht"}}</b></p>
    {!!$d->confirmation_table!!}
    <hr>
    <br>
    <p style='color:navy'>IHRE KONTAKTANGABEN</p>
    <p>Anrede:{{$d->gender==0?"Herr":"Frau"}} </p>
    <p>Name: {{$d->name, "(n.d.)"}}</p>
    <p>Firma: {{$d->company, "(n.d.)"}}</p>
    <p>Adresse: {{$d->address, "(n.d.)"}}</p>
    <p>Land: {{$d->country, "(n.d.)"}}</p>
    <p>Telefon:{{$d->telephone, "(n.d.)"}} </p>       
    <p>E-mail: {{$d->email, "(n.d.)"}}</p>
    <br>
    <p style='color:navy'>{{strtoupper('ZusÄtzliche Informationen')}}</p>
    <p>Ihre Wünsche: {{$d->note, "(n.d.)"}}</p>
    <br>

    <br>
    <p style='color:navy'>{{strtoupper('RESERVATIONSGARANTIE')}}</p>
    @if($d->creditcard_required==1)
        @if($cc['no_cc']==1)
            <p><b>Ich habe keine Kreditkarte. Bitte kontaktieren Sie mich</b></p><br>
        @else
            <p>Kreditkartentyp: {{$cc['cc_type']}}</p>
            <p>Kreditkartennumber: {{$cc['cc_number']}}</p>
            <p>Gültig: Monat/Jahr: {{$cc['cc_m_y']}}</p>
            <p>Karteninhaber: {{$cc['cc_name']}}</p>
        @endif
    @endif
    <p style='color:navy'>{{strtoupper('Gutschein')}}</p>
    <p>Gutschein Code: {{$d->vaucher_code, "(n.d.)"}}</p>
    <p>Marketing Code:{{$d->marketing_code, "(n.d.)"}}</p>
    <p>Total Betrag: {{$d->vaucher_amount, "(n.d.)"}}</p>
    <br><br>
    <p>Für Fragen stehen wir Ihnen gerne zur Verfügung.</p>
    <p>Beste Grüsse</p>
    <br>
    <p>Ihr Service-Team</p>
    <p>Swiss Insider GmbH</p>
    <p>Telefon:  	+41 (0)43 288 06 26</p>
    <p>E-mail:  	info@meinweekend.ch</p>
    <p>URL: <a href='www.meinweekend.ch'>www.meinweekend.ch</a></p>


@endforeach

</body>
<style>


        body {
            font-family: Tahoma,Helvetica;
            line-height: 21px;
        }
        table {
            width: 100%;
            margin-top: 25px;
            margin-bottom: 15px;
            }
        .table tr td {
            
            padding: 0px;
        }
    
        .bill-orderlist tr{
            border:1 px solid navy;
        }
        .bill-orderlist th{
            color:navy;
            border-bottom:navy;
        }
        .confCondWarp {
    
            padding: 20px 50px;
            margin-right: 50px;
            background-color: #d3d3d3;
        }
    
        .confCondWarp p {
    
            line-height: 24px;
            margin-bottom: 0px;
        }
    
        .noPaddingTB {
            padding-top: 0px !important;
            padding-bottom: 0!important;
            }
    
        .tablE1 td, .tablE2 td, .tablE3 td,.tablE5 td,.tablE6 td,.tablE7 td{
            border: 1px;
            color: black;
            }
    
        .tablE3 td{
    
            padding: 0;
            }
    
        .tablE3 p{
    
            color:black;
            font-size: 1rem;
            }
        .tablE4 tr th {
    
            color: #013a89;
            }
    
            .tablE4 tfoot tr td {
    
            color: #013a89;
            }
    
            .tablE4 tbody tr:first-child,.tablE4 tbody tr:last-child {
    
            border-bottom: 1px solid #013a89;
            }
    
            .tablE5 p, .tablE6 p{
    
            color: black;
            font-size: 16px;
            }
    
            .tablE5 p:nth-child(2) {
    
            margin-bottom: 20px;
            }
    
            .tablE5 p:nth-child(7) {
    
            margin-bottom: 20px;
            }
            .tablE5 h2{
    
            font-size: 16px;
            color: #013a89;
            }
    
            .tablE5 {
    
            margin-top: 40px;
            padding-top: 20px;
            }
    
            .tablE6 {
    
            margin-top: 40px;
            }
    
            .tablE6 p:nth-child(3) {
    
            margin-bottom: 20px;
            }
    
            .tablE6 p:nth-child(6) {
    
            margin-bottom: 20px;
            }
    
            .tablE6 p:nth-child(8) {
    
            margin-bottom: 20px;
            }
    
            .meinInfo1 {
    
            color: #013a89 !important;
            text-align: right;
    
            }
    
            .meinInfo2 {
    
            color: #666;
            text-align: right
            }
    
            .contactInfo {
    
            text-align: right;
            }
    
            .resCode b{
    
            font-size: 20px;
            color: #626262 !important;
    
            }
    
            .resCapt {
    
            color: #013a89;
            font-size: 22px;
            }
    
            .resTr1 td{
            color: #013a89;
            border-top:none;
            }
    
            .resTr1 td,.resTr2 td,.resTr3 td {
    
            border-color: #013a89;
            }
    
            .resTr3{ 
    
            color: #013a89;
            }
    
            .resBackG {
    
            background: #eeeeee;
            width: 50%;
    
            }
    
            .tablE4 {
    
            padding-top: 25px;
            padding-bottom: 15px;
            }
            
           
    </style>