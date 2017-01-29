{include file='index_layout_top.tpl'}    
    
<div align="center">
    <div id="main">

        {foreach from=$teams item=foo}
            <li>{$foo['teamName']}</li>
        {/foreach}

        <a href="/runToss/" role="button" class="btn btn-default">Запустить жеребъевку</a>

    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="/assets/js/index.js"></script>
{include file='index_layout_bottom.tpl'}