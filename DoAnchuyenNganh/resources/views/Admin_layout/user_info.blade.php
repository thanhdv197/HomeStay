<div class="sb2-12">
    <ul>
        <li><img src="{{ Auth::check()?Auth::user()->avatar:null }}" alt="">
        </li>
        <li>
            <h5>{{ Auth::check()?Auth::user()->name:null }}<span>{{ Auth::check()?Auth::user()->address:null }}</span>
            </h5>
        </li>
        <li></li>
    </ul>
</div>