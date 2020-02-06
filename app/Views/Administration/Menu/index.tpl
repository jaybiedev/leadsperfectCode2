[[extends file="Finance/template.tpl"]]
[[block name="CssBlock"]]
    <link rel="stylesheet" href="/libs/jstree/themes/default/style.min.css">
[[/block]]
[[block name="ContentBody"]]
    <div class="row">
      <div class="col-6">
        <div style="display:none;">
            Filter: <input type="text" id="search" /><button id="clear">Clear</button>
        </div>
        <div id="menutree" >
            <ul>
                [[foreach name=entry item=entry from=$menu]]
                    <li id="[[$entry->id]]">
                        [[$entry->menu]]
                        [[if $entry->children neq null]]
                            [[include file="[[$APPPATH]]Views/Common/_recursive_ul_generic.tpl" child=$entry->children parent=$entry depth=2]]
                        [[/if]]
                    </li>
                [[/foreach]]
            </ul>      
        </div>
    </div>
    <div id="permission-pane" class="col-6 float-right report-filter-wrapper" style="position:fixed;border-top:1px solid #ccc">
        <div style="display:none;">
            <p>Selected items:</p>
            <ul id="output"></ul>
        </div>
        <form>
            
        </form>
        <div class="report-buttons-bottom float-right">
            <button type="button" class="btn btn-primary" id="save-permissions">Save changes</button>
            <button type="button" class="btn btn-secondary btn-cancel-generic">Close</button>
        </div>
    </div>
[[/block]]
[[block name="JavascriptBlock"]]
    <script src="/libs/jstree/jstree.min.js"></script>
[[/block]]