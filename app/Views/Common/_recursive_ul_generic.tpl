<ul>
[[foreach name=entry item=entry from=$child]]
    <li  id="[[$entry->id]]">
        [[$entry->menu]]
        [[if $entry->children neq null]]
            [[include file="[[$APPPATH]]Views/Common/_recursive_ul_generic.tpl" child=$entry->children depth=$depth+1]]
        [[/if]]
    </li>
[[/foreach]]
</ul>