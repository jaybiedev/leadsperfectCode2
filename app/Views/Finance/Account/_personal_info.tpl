  <div class="row">
    <div class="col-6">
      <table width="99%" border="0" cellpadding="0" cellspacing="1">
        <tr> 
          <td class="p-25 lbl">Birth Date</td>
          <td class="p-25"><input name="account[date_birth]" type="text" id="date_birth" class="form-control inline datepicker" value="[[$aAccount->date_birth|date_format:"%m/%d/%Y"]]" maxlength="10"></td>
          <td class="p-25 tdr lbl">Age</td>
          <td class="p-25"><input name="account[age]" type="number" id="age" class="form-control inline" value="[[$aAccount->age]]" maxlength="10" /></td>
        <tr>
        <tr> 
          <td class="p-25 tdl lbl">Civil Status</td>
          <td class="p-25">[[civilstatusdropdown name="account[civil_status]"  selected=$aAccount->civil_status]]</td>
          <td class="p-25 tdr lbl">Gender</td>
          <td>[[genderdropdown name="account[gender]"  selected=$aAccount->gender]]</td>
        <tr>   
        <tr>
          <td class="lbl p-25">Member</td>
          <td colspan="3"><input name="account[member]" type="text" id="member" value="[[$aAccount->member]]" size="40" maxlength="40"  class="form-control"/></td>
        </tr>     
        <tr>
          <td class="lbl p-25">Member SSS</td>
          <td><input name="account[sss]" type="text" id="sss" class="form-control" value="[[$aAccount->sss]]" size="20" maxlength="20"></td>
          <td class="lbl tdr p-25">Date of Death</td>
          <td><input name="account[date_death]" type="text" class="form-control datepicker" value="[[$aAccount->date_death|date_format:"%m/%d/%Y"]]"/></td>
        </tr>     
        <tr>
          <td class="lbl p-25">Client Name</td>
          <td colspan="3">
            <input name="account[firstname]" type="text" class="form-control inline p-33" id="firstname" placeholder="First name" maxlength="40"   value="[[$aAccount->firstname]]" />
            <input name="account[lastname]" type="text" class="form-control inline p-33" id="lastname" placeholder="Last name" value="[[$aAccount->lastname]]" maxlength="40"  />
            <input name="account[middlename]" type="text" class="form-control inline p-32" id="middlename" placeholder="Middle name" value="[[$aAccount->middlename]]" maxlength="40"  />
          </td>
        </tr>  
        <tr>
          <td class="lbl p-25" style="vertical-align:top;">Address</td>
          <td colspan="3">
            <textarea name="account[address]" cols="50" rows="2" id="textarea" class="form-control">[[$aAccount->address]]</textarea>
          </td>
        </tr>  
        <tr>
          <td class="lbl p-25">Telephone</td>
          <td colspan="3"><input name="account[telno]" type="tel" id="telno" value="[[$aAccount->telno]]" size="20" maxlength="20" class="form-control"/></td>
        </tr>   
        <tr>
          <td class="lbl p-25">Spouse Name</td>
          <td colspan="3"><input name="account[spouse]" type="text" id="spouse" value="[[$aAccount->spouse]]" size="20" maxlength="20" class="form-control"/></td>
        </tr>    
        <tr>
          <td class="lbl p-25">Spouse SSS</td>
          <td><input name="account[spouse_sss]" type="text" id="spouse_sss" value="[[$aAccount->spouse_sss]]" size="20" class="form-control"/></td>
          <td class="lbl tdr p-25">Date of Birth</td>
          <td><input name="account[date_spouse]" type="text" class="form-control datepicker" value="[[$aAccount->date_spouse|date_format:"%m/%d/%Y"]]"/></td>
        </tr> 
        <tr>
          <td class="lbl p-25" style="vertical-align:top;">Remarks</td>
          <td colspan="3">
            <textarea name="account[remarks]" cols="50" rows="4" id="remarks" class="form-control">[[$aAccount->remarks]]</textarea>
          </td>
        </tr>                             
    </table>
    </div>
    <!-- column 2 -->
    <div class="col-6">
      <table>
        <tr>
          <td colspan="4"><span class="lbl">Classification</span></td>
        </tr>
        <tr>
          <td colspan="4" class="pad-left-20px"> 
            <label><input type="radio" name="account[mclass]" 
              value="1" [[if ($aAccount->mclass == '1'  || $aAccount->mclass == '')]]checked[[/if]] />
            Pensioner (Personal )</label>
          </td>
        </tr>
        <tr>
          <td colspan="4" class="pad-left-20px"> 
            <label><input type="radio" name="account[mclass]" 
            value="2" [[if ($aAccount->mclass == '2')]]checked[[/if]]] />
            Survivor/Widower/Beneficiary</label>
          </td>
        </tr>
        <tr>
          <td colspan="3" class="pad-left-50px"> 
            <label for="mclasssub">Sub Classification</label>
            [[classsubdropdown name="account[mclasssub]" class="inline mclass2" style="width:150px;" selected=$aAccount->mclasssub]]
          </td>
          <td> 
            
          </td>
        </tr>      
        <tr>
          <td colspan="2" class="pad-left-50px"> 
            1. <input name="account[child1]" type="text" id="child1" value="[[$aAccount->child1]]" size="30" maxlength="30" class="form-control inline mclass2" style="width:90%;"/>
          </td>
          <td nowrap>B-Day before 21</td>
          <td><input name="account[date_child21]" type="text" id="date_child21" value="[[$aAccount->date_child21|date_format:"%m/%d/%Y"]]" class="form-control inline datepicker mclass2" /></td>
        </tr>  
        <tr>
          <td colspan="2" class="pad-left-50px"> 
            2. <input name="account[child2]" type="text" id="child2" value="[[$aAccount->child2]]" size="30" maxlength="30" class="form-control inline mclass2" style="width:90%;"/>
          </td>
          <td nowrap>B-Day before 21</td>
          <td><input name="account[date_child21b]" type="text" id="date_child21b" value="[[$aAccount->date_child21b|date_format:"%m/%d/%Y"]]" class="form-control inline datepicker mclass2" /></td>
        </tr>  
        <tr>
          <td colspan="2" class="pad-left-50px"> 
            3. <input name="account[child3]" type="text" id="child3" value="[[$aAccount->child3]]" size="30" maxlength="30" class="form-control inline mclass2" style="width:90%;"/>
          </td>
          <td nowrap>B-Day before 21</td>
          <td><input name="account[date_child21c]" type="text" id="date_child21c" value="[[$aAccount->date_child21c|date_format:"%m/%d/%Y"]]" class="form-control inline datepicker mclass2" /></td>
        </tr>  
        <tr>
          <td colspan="2" class="pad-left-50px"> 
            4. <input name="account[child4]" type="text" id="child4" value="[[$aAccount->child4]]" size="30" maxlength="30" class="form-control inline mclass2" style="width:90%;"/>
          </td>
          <td nowrap>B-Day before 21</td>
          <td><input name="account[date_child21d]" type="text" id="date_child21d" value="[[$aAccount->date_child21d|date_format:"%m/%d/%Y"]]" class="form-control inline datepicker mclass2" /></td>
        </tr>                        
        <tr>
          <td colspan="4" class="pad-left-20px"> 
            <label><input type="radio" name="account[mclass]" value="3"  [[if ($aAccount->mclass == '3')]]checked[[/if]]>
            Permanent Disability</label>
          </td>
        </tr>  
        <tr>
          <td colspan="4" class="pad-left-20px"> 
            <label><input type="radio" name="account[mclass]" value="4"  [[if ($aAccount->mclass == '4')]]checked[[/if]]>
            Temporary Disability</label>
          </td>
        </tr>  
        <tr>
          <td colspan="4" class="pad-left-20px"> 
            <label><input type="radio" name="account[mclass]" value="5"  [[if ($aAccount->mclass == '5')]]checked[[/if]]> 
            Guardian</label>
          </td>
        </tr>   
        <tr>
          <td  class="pad-left-50px">
              <input type="checkbox" name="account[changebank]"  id="changebank" class="mclass5" value=""  [[if ($aAccount->nchangebank > '0')]]checked[[/if]]> 
            Record of Bank Change
          </td>
          <td>No. Times</td>
          <td><input name="account[nchangebank]" type="number" class="form-control mclass5" style="width:60px;" id="nchangebank" value="[[$aAccount->nchangebank]]" size="5" maxlength="5"></td>
        </tr>
      </table>
    </div>
  </div>
  