/**
 * @author Henry Lee
 */
$(function(){
	/*全选*/
	$(".all").live('click',function(){
		href = href.replace(/{(\w+)}/, '');
		var id_list='';
		if($('.gridTbody :checked').length != $('.gridTbody').find(':checkbox').length){
	    	$('.gridTbody').find(':checkbox').each(function(){
		    	$(this).attr('checked',true);
		    	if(id_list==''){
					id_list += $(this).val();
				}else{
					id_list = id_list+','+$(this).val(); 
				}
		    });
		}else{
			$('.gridTbody').find(':checkbox').each(function(){
		    	$(this).attr('checked',false);
		    	id_list='{sid}';
		    });
		};
		$("#delete").attr('href', href+id_list);
	});
		
	$('.gridTbody').find(':checkbox').live('click', function(){
		href = href.replace(/{(\w+)}/, '');
		var id_list='';
		if($('.gridTbody :checked').length <= 0){
			id_list='{sid}';
		}
		$('.gridTbody :checked').each(function(){
			if(id_list==''){
				id_list += $(this).val();
			}else{
				id_list = id_list+','+$(this).val(); 
			}
		});
		$("#delete").attr('href', href+id_list);
	});
})