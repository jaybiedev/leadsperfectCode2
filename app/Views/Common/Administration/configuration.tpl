[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
   <form class="form-post-ajax-generic" action="" method="POST">
      [[foreach from=$sysconfigs key=key item=SysConfig]]
         [[if $SysConfig->description neq '']]
            <label for="[[$SysConfig->sysconfig]]">[[$SysConfig->description]]</label>
            <input type="text" 
               class="form-group form-control"
               id="[[$SysConfig->sysconfig]]"
               name="field&#91;[[$SysConfig->sysconfig]]&#93;" 
               value="[[$SysConfig->value]]" />
         [[/if]]
      [[/foreach]]

      <button type="button" class="btn btn-primary btn-form-post-ajax-generic">
         <i class="fa fa-save"></i> Save
      </button>
      <button type="button" class="btn btn-outline btn-cancel-generic" url="/administration" >
         <i class="fa fa-times"></i> Cancel
      </button>
   </form>
[[/block]]