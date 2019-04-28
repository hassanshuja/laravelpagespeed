

        
         <p>Neue Gutscheinbestellung:</p>
          <p class='blueText' style='color: rgb(0,57,146);  font-weight: 400; font-size: 16px; text-transform:uppercase'> Rechnungs/Versandadresse</p>
    <table>
        <tr>
            <th width="200px"></th>
            <th></th>
        </tr>
        <tr>
            <td>
                Anrede:
            </td>
            <td>
                <?php echo e($request->user['gender']); ?>

            </td>
        </tr>
        <tr>
            <td>
                Vorname / Nachname:
            </td>
            <td>
                <?php echo e($request->user['first_name']); ?> <?php echo e($request->user['last_name']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                Firma:
            </td>
            <td>
                <?php echo e($request->user['company']); ?>

            </td>
        </tr>
        <tr>
            <td>
                Adresse:
            </td>
            <td>
                <?php echo e($request->user['address']); ?>

            </td>
        </tr>
        <tr>
            <td>
                PLZ/Ort:
            </td>
            <td>
                <?php echo e($request->user['zip']); ?> <?php echo e($request->user['city']); ?>

            </td>
        </tr>
        <tr>
            <td>
                Telefon:
            </td>
            <td>
                <?php echo e($request->user['telephone']); ?> 
            </td>
        </tr>
        
        <tr>
            <td>
                E-Mail:
            </td>
            <td>
                <?php echo e($request->user['email']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                Informationen zur Gutscheinlieferung:
            </td>
            <td>
                <?php echo e($request->message); ?> 
            </td>
        </tr>
        
        <tr>
            <tr>
                <td>Zahlungsart:</td>
                <td><?php echo e($request->payment_type); ?></td>
            </tr>
            <tr>
                <td>Versand:</td>
                <td>Postversand</td>
            </tr>
        </tr>
    </table>

<br>

          <p class='blueText' style='color: rgb(0,57,146);  font-weight: 400; font-size: 16px; text-transform:uppercase'> MeinWeekend.ch Wertgutschein</p>
          <table>
              <tr>
                  <th width="200px"></th>
                  <th></th>
              </tr>
              <tr>
                  <td>Ausgestellt auf: </td>
              <td><?php echo e($request->vaucher_for); ?></td>
              </tr>
              <tr>
                  <td style='vertical-align:top'>Text auf Gutschein:</td>
                  <td><?php echo e($request->vaucher_text); ?></td>
              </tr>
              <tr>
                  <td>Wert: </td>
                  <td><?php echo e($data[0]->total_currency==0?"CHF":"EUR"); ?> <?php echo e($data[0]->total_price); ?></td>
              </tr>
              
          </table>
          <br>
         <p>Wir hoffen, Ihnen damit dienen zu können und stehen für Fragen gerne zur Verfügung.</p> 
    
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