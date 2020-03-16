<?php 
    include_once '../inc/header.php';
    include_once '../inc/menu.php';
?>

<!-- Body section -->


<div id="c_main">

    <div class="page_header">
        <h3 id="admin_page_header">Žurnalas</h3>
        <div class="header_description" id="header_description">

        </div>
    </div>

    <div class="page_content">

        <div class="row">
            <div class="col-md-14 d-flex" style="position:relative;" id="admin_content">
            <style>
pre{
  font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
  margin-bottom: 10px;
  overflow: auto;
  width: auto;
  padding: 5px;
  background-color: #eee;
  width: 650px!ie7;
  padding-bottom: 20px!ie7;
  max-height: 600px;
}
</style>

<blockquote>
        <pre style="max-height: 300px; overflow-y: auto;">
          <code>
              <?=$logs?>
          </code>
        </pre>
</blockquote>
            </div>
        </div>
    </div>
</div>

<!-- Loading scripts -->
<script>

</script>

<?php include_once '../inc/footer.php';?>