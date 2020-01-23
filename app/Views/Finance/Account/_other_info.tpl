 <table>
  <tr> 
    <td class="lbl p-10">Employer/Ofc.</td>
    <td class="p-40"><input name="account[office]" type="text" class="form-control inline" id="office" value="[[$aAccount->office]]" size="52" maxlength="50"/></td>
    <td class="p-10"></td>
    <td class="p-40"></td>
  </tr>
  <tr valign="top"> 
    <td class="lbl">Office Address</td>
    <td><textarea name="account[ofc_address]" class="form-control inline"  id="ofc_address" cols="40" rows="2" tabindex='60'>[[$aAccount->ofc_address]]</textarea></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td class="lbl">Telephone</td>
    <td><input name="account[ofc_telno]" type="text" class="form-control inline"  id="ofc_telno"  tabindex="61" value="[[$aAccount->ofc_telno]]" size="15" maxlength="15"/></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td class="lbl">Co-Maker1</td>
    <td class="lbl"><input name="account[comaker1]" class="form-control inline"  type="text" id="comaker1" value="[[$aAccount->comaker1]]" size="50" maxlength="50"/>
    <td class="lbl tdr">Relationship</td>
    <td><input name="account[comaker1_relation]" type="text" class="form-control inline"  id="comaker1_relation" value="[[$aAccount->comaker1_relation]]" size="35" maxlength="35"/></td>
  </tr>
  <tr> 
    <td valign="top" class="lbl">Address</td>
    <td><input name="account[comaker1_address]" type="text" class="form-control inline"  id="comaker1_address" value="[[$aAccount->comaker1_address]]" size="50" maxlength="75"/></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td valign="top" class="lbl">Co-Maker2</td>
    <td><input name="account[comaker2]" type="text" class="form-control inline"  id="comaker2" value="[[$aAccount->comaker2]]" size="50" maxlength="35"/>
    <td class="lbl tdr">Relationship</td>
    <td><input name="account[comaker2_relation]" type="text" class="form-control inline"  id="comaker2_relation" value="[[$aAccount->comaker2_relation]]" size="35" maxlength="35" /></td>
  </tr>
  <tr> 
    <td valign="top" class="lbl">Address</td>
    <td><input name="account[comaker2_address]" type="text" class="form-control inline"  id="comaker2_address" value="[[$aAccount->comaker2_address]]" size="50" maxlength="75"/></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td valign="top" class="lbl">Co-Maker3</td>
    <td ><input name="account[comaker3]" type="text" class="form-control inline"  id="comaker3" value="[[$aAccount->comaker3]]" size="50" maxlength="35"/>
    <td class="lbl tdr">Relationship</td>
    <td><input name="account[comaker3_relation]" type="text" class="form-control inline"  id="comaker3_relation" value="[[$aAccount->comaker3_relation]]" size="35" maxlength="35" /></td>
  </tr>
  <tr> 
    <td valign="top" class="lbl">Address</td>
    <td><input name="account[comaker3_address]" type="text" class="form-control inline"  id="comaker3_address" value="[[$aAccount->comaker3_address]]" size="50" maxlength="75" /></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td valign="top" class="lbl">&nbsp;</td>
    <td><input name="account[picture]" type="hidden" id="picture" value="[[$aAccount->picture]]" size="15" maxlength="15"></td>
    <td></td>
    <td></td>
</tr>
</table>