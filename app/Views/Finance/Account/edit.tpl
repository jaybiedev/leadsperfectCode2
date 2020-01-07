[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <form>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control" id="account" placeholder="Account Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="branch" placeholder="branch">
            </div>
       </div>
        
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Personal Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Other Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Loans</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Image Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logs</a>
            </li>
        </ul>

    </form>
[[/block]]