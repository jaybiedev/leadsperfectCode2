<ul class="dropdown-menu"  aria-labelledby="[[$parent->path]]">
[[foreach name=entry item=entry from=$child]]
    <li class="dropdown-item [[if $entry->children neq null ||$depth>2]]dropdown[[/if]]">
        <a href="[[$entry->slug]]"  aria-expanded="false" [[if $entry->children neq null]]data-toggle="dropdown"[[/if]] id="[[$entry->path]]">[[$entry->menu]][[if $entry->children]] ...[[/if]]</a>
        [[if $entry->children neq null]]
            [[include file="[[$APPPATH]]Views/Common/_recursive_ul.tpl" child=$entry->children depth=$depth+1]]
        [[/if]]
    </li>
[[/foreach]]
</ul>