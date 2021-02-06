[[extends file='./template.tpl']]
[[block name=title]][[$View->pageTitle]][[/block]]
[[block name=body]]
    [[if $View->pageTitle neq '']]
      <div class="row">
         <h3>[[$View->pageTitle]]</h3>
      </div>
    [[/if]]
   [[$contents]]
[[/block]]