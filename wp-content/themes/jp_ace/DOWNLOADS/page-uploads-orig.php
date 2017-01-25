<?php
/*
Template Name: MOD-Uploads-orig
*/
?>

<?php get_header(); ?>

<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/sheetjs/vendor/alertify.css" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/chosen/chosen.css" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/MOD-Uploads/style.css" />

		<!-- SCRIPTS -->
<!--         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jQuery/jquery-1.11.2.js"></script> -->
		<script src="<?php bloginfo('template_url'); ?>/vendors/chosen/chosen.jquery.min.js" ></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/sheetjs/vendor/alertify.js"></script>
		        
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxcore.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxmenu.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.filter.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.selection.js"></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxcheckbox.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxdropdownlist.js"></script>

        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/jqxgrid.columnsresize.js"></script>


<?php get_sidebar(); ?>

<?php 
    global $current_user;
    get_currentuserinfo(); 
    $userID    = $current_user->ID;
    $userRole = ($current_user->roles[0]);
    
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php get_template_part('templates/pre-page'); ?>

	<section class="content">

		<div class="row">
			
			<div id="gridOuter">
                <div style="margin: 10px 20px;">
                	<a class="add_lnk" href="/mod-uploads-add-upload/"><i class="fa fa-plus-circle"> </i> Add a File</a>
                    <div id="masterGrid"></div>
                </div>
			</div>
					
		</div>
				
	</section>
			

</div><!-- #content -->


<?php get_footer(); ?>


<script>
	var buttonclick = function (id) {
		
		alertify.confirm("Delete Record? ", function(e) {
			if (e) {
				$("#masterGrid").jqxGrid('deleterow', id);
			}
		});
		
	}
</script>

<script>

	$(document).ready(function() {

        url = "<?php bloginfo('template_url'); ?>/MOD-Uploads/inc/get_uploads.php";

        var source =
        {
            datatype: "json",
            datafields: [
	            { name: 'id', type: 'integer' },
                { name: 'title', type: 'string' },
                { name: 'message_date', type: 'date', format: 'yyyy-MM-dd' },
                { name: 'description', type: 'string' },
                { name: 'filename', type: 'string' }
            ],
            id: 'id',
            url: url,
            pagenum: 0,
            pagesize: 20,
            sortcolumn: 'id',
            sortdirection: 'desc',
            root: 'data',
            pager: function (pagenum, pagesize, oldpagenum) {
	          // callback called when page or page size is changed.  
            },
            deleterow: function (rowid, commit) {
   	            var urlpath = "<?php bloginfo('template_url'); ?>/MOD-Uploads/inc/del_upload.php";
				var data = "fid=" + rowid;
                $.ajax({
                    dataType: 'json',
                    url: urlpath,
                    data: data,
                    success: function (data, status, xhr) {
                        // update command is executed.
                        commit(true);
                    },
                    error: function () {
                        // cancel changes.
                        commit(false);
                    }
                });
            },

        };

		var linkrenderer = function (row, column, value) {
			if (value.indexOf('#') != -1) {
				value = value.substring(0, value.indexOf('#'));
			}
			var html = $.jqx.dataFormat.formatlink(value, format);
			return html;
		}

		var cellscenter = function (row, column, value) {
			return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
		}
		var columnscenter = function (value) {
			return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
		}
		var cellsleft = function (row, column, value) {
			return '<div style="overflow: hidden; text-overflow: ellipsis; padding-bottom: 2px; text-align: left; margin-right: 2px; margin-left: 5px; margin-top: 21.5px;">' + value + '</div>';
		}
		var columnsleft = function (value) {
			return '<div style="text-align: left; margin-top: 5px; margin-left: 5px;">' + value + '</div>';
		}

		var dataAdapter = new $.jqx.dataAdapter(source);
		dataAdapter.dataBind();
		
		$('#masterGrid').jqxGrid({
			autoheight: true,
			width: '100%',
			source: dataAdapter,
			autorowheight: true,
			columnsheight: '30px',
			columnsresize: true,
            sortable: true,
            pageable: true,
            altrows: true,
            filterable: true,
            showfilterrow: true,
			columns: [
				{ text: 'ID', dataField: 'id', width: 40, filterable: false, renderer: columnscenter, cellsalign: 'center' },
				{ text: 'Title', dataField: 'title', renderer: columnsleft, cellsalign: 'left' },
				{ text: 'Date', dataField: 'message_date', width: 90, filtertype: 'date', cellsformat: 'd' },
				{ text: 'Description', dataField: 'description', filtertype: 'input' },
				{ text: 'File Name', dataField: 'filename', filtertype: 'input' },
				{ text: 'Edit', dataField: 'Edit', renderer: columnscenter, filterable: false, sortable: false, menu: false, width: 120,
					cellsrenderer: function(index, datafield, value, defaultvalue, column, rowdata) {
						return "<div style='text-align: center;'><a class='btn btn-sm btn-primary' style='margin: 10px 0 0 0; position: relative; width: 40px;color: #fff;' href='" + '/mod-uploads-edit-upload/?upl=' + rowdata.id + "'><i class='glyphicon glyphicon-pencil'> </i></a></div>";
					}
				},
				{ text: 'Delete', dataField: 'Delete', renderer: columnscenter, filterable: false, sortable: false, menu: false, width: 120,
					cellsrenderer: function(index, datafield, value, defaultvalue, column, rowdata) {
						return "<div style='text-align: center;'><button onClick='buttonclick(" + rowdata.id + ")' class='btn btn-sm btn-danger' style='margin: 10px 0 0 0; position: relative; width: 40px;color: #fff;' id='btn'" + rowdata.id + "'><i class='glyphicon glyphicon-trash'> </i></button></div>";
					}
				},
			]
		});
		
	});


</script>



