
     
        {{$request->user['gender']=="Herr"?"Lieber":"Liebe"}} {{$request->user['gender']}} {{$request->user['last_name']}}
      
        @if($request->send_type=='Postversand')
        <p>Herzlichen Dank für Ihre Gutscheinbestellung.</p>
        <p>Der folgende Erlebnisgutschein wird Ihnen innert 24 Stunden per A-Post zugeschickt:</p>
     
        <p class='blueText' style='color: rgb(0,57,146);  font-weight: 400; font-size: 16px;'> WERTGUTSCHEIN MEINWEEKEND.CH</p>
        <table>
            <tr>
                <th width="200px"></th>
                <th></th>
            </tr>
            <tr>
                <td>Ausgestellt auf: </td>
            <td>{{$request->vaucher_for}}</td>
            </tr>
            <tr>
                <td style='vertical-align:top'>Text auf Gutschein:</td>
                <td>{{$request->vaucher_text}}</td>
            </tr>
            <tr>
                <td>Wert: </td>
                <td>{{$data[0]->total_currency==0?"CHF":"EUR"}} {{$data[0]->total_price}}</td>
            </tr>
            <tr>
                <td>Zahlungsart:</td>
                <td>{{$request->payment_type}}</td>
            </tr>
            <tr>
                <td>Versand:</td>
                <td>Postversand</td>
            </tr>
        </table>
        <br>
       <p>Wir hoffen, Ihnen damit dienen zu können und stehen für Fragen gerne zur Verfügung.</p> 
        @elseif($request->send_type=='print@home')
            <p>Herzlichen Dank für Ihre Gutscheinbestellung.</p>
            <p>Gerne senden wir Ihnen den Wertgutschein ({{$data[0]->total_currency==0?"CHF":"EUR"}} {{$data[0]->total_price}}) von MeinWeekend.ch zusammen mit der Rechnung in der Beilage.
                Der Gutschein ist auf A4 formatiert und zum selber Ausdrucken.</p>
            <p>Bitte beachten Sie, der Gutschein ist ab Ausstellungsdatum fünf Jahre gültig und auf allen Angeboten von MeinWeekend.ch einlösbar.</p>
            <p>Wir wünschen Ihnen eine wunderschöne Überraschung.</p>
        @endif
        <br>
        Beste Grüsse<br>
        <br>
        Ihr Service-Team<br>
        Swiss Insider GmbH<br>
                <br>
        <table cellspacing="0" cellpadding="0" border="0">
        <tbody><tr><td style="padding:0">Telefon&nbsp;</td><td style="padding:0">+41 (0)43 288 06 26</td></tr>
        <tr><td style="padding:0">E-Mail</td><td style="padding:0"><a href="mailto:info@meinweekend.ch" target="_blank">info@meinweekend.ch</a></td></tr>
        <tr><td style="padding:0">URL</td><td style="padding:0"><a href="https://www.meinweekend.ch" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.meinweekend.ch&amp;source=gmail&amp;ust=1525940719709000&amp;usg=AFQjCNF01RJBitOsXiFrXMD-R8L-9wxyJA">www.meinweekend.ch</a></td></tr>
        </tbody></table><div class="yj6qo"></div><div class="adL">
        </div></div><div class="adL">
        </div></div>
        
        <style>
        
            .blueText{
                color: rgb(0,57,146);
                font-size: 16px;
                font-weight: 400;
                line-height: 24px;
                margin: 5px 0px;
                text-transform: uppercase;
            }

            a{
                text-decoration: none;
            }
        </style>