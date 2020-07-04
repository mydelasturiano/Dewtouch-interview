<?php echo $this->Html->script('easy-editable-text', array('inline'=>false)); ?>
<style>
	input[type=text]
	{
		margin-top:8px;
		font-size:18px;
		color:#545454;
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		-border-radius: 2px;
		display:none;
		width:280px;
		
	}

	textarea
	{
		margin-top:8px;
		font-size:18px;
		color:#545454;
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		-border-radius: 2px;
		display:none;
		width:580px;
		
	}

	label
	{
		float:left;
		margin-top:8px;
		font-size:18px;
		color:#545454;
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		-border-radius: 2px;
	}

	.edit
	{
		float:left;
		background:url(images/edit.png) no-repeat;
		width:25px;
		height:25px;
		display:block;
		cursor: pointer;
		margin-left:10px;
	}

	.clear
	{
		clear:both;
		height:20px;
	}
</style>
<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>


<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
	<tr>
		<td></td>
		<td>
			<label class="text_label">Click The Pencil Icon to Edit Me</label>
			<div class="edit"><?php echo $this->Html->image('edit', array('inline'=>false)); ?></div>
			<textarea name="data[0][description]" class="m-wrap description required" rows="4"></textarea>
		</td>
		<td>
			<label class="text_label">Click The Pencil Icon to Edit Me</label>
			<div class="edit"><?php echo $this->Html->image('edit', array('inline'=>false)); ?></div>
			<input name="data[0][quantity]" type="text" class="m-wrap description required" value="Click The Pencil Icon to Edit Me">
		</td>
		<td>
			<label class="text_label">Click The Pencil Icon to Edit Me</label>
			<div class="edit"><?php echo $this->Html->image('edit', array('inline'=>false)); ?></div>
			<input name="data[0][unit_price]" type="text" class="m-wrap description required" value="Click The Pencil Icon to Edit Me">
		</td>
	</tr>
</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<script>

$(document).ready(function() {
	
	var max_fields = 10;
	var wrapper = $(".table");
	var add_button = $("#add_item_button");

	var x = 1;
	$(add_button).click(function(e) {
		e.preventDefault();
		if (x < max_fields) {
			$(wrapper).append(
				'<tr>'+
				'<td></td>'+
				'<td>'+
					'<label class="text_label">Click The Pencil Icon to Edit Me</label>'+
					'<div class="edit"><?php echo $this->Html->image("edit", array("inline"=>false)); ?></div>'+
					'<textarea name="data['+x+'][description]" class="m-wrap description required" rows="4" ></textarea></td>'+
				'<td>'+
					'<label class="text_label">Click The Pencil Icon to Edit Me</label>'+
					'<div class="edit"><?php echo $this->Html->image("edit", array("inline"=>false)); ?></div>'+
					'<input name="data['+x+'][quantity]" type="text" class="m-wrap description required" value="Click The Pencil Icon to Edit Me">'+
				'</td>'+
				'<td>'+
					'<label class="text_label">Click The Pencil Icon to Edit Me</label>'+
					'<div class="edit"><?php echo $this->Html->image("edit", array("inline"=>false)); ?></div>'+
					'<input name="data['+x+'][unit_price]" type="text" class="m-wrap description required" value="Click The Pencil Icon to Edit Me"></td>'+
				'</tr>'
			);
			x++;
		} 
		else 
		{
			alert('You Reached the limits')
		}
		textToInputField();
	});
	textToInputField();
});

// Text to input field
function textToInputField(){
	$(document).ready(function() {
		$('.edit').click(function(){
			$(this).hide();
			$(this).prev().hide();
			$(this).next().show();
			$(this).next().select();
		});
		
		
		$('input[type="text"], textarea').blur(function() {  
	        	if ($.trim(this.value) == ''){  
				this.value = (this.defaultValue ? this.defaultValue : '');  
			}
			else{
				$(this).prev().prev().html(this.value);
			}
			 
			$(this).hide();
			$(this).prev().show();
			$(this).prev().prev().show();
		});

		  
		$('input[type="text"], textarea').keypress(function(event) {
			if (event.keyCode == '13') {
				if ($.trim(this.value) == ''){  
					 this.value = (this.defaultValue ? this.defaultValue : '');  
				}
				else
				{
					$(this).prev().prev().html(this.value);
				}
				 
				$(this).hide();
				$(this).prev().show();
				$(this).prev().prev().show();
			}
		});
	});
}

</script>
<?php $this->end();?>

