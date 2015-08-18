/**
 * @author Henry Lee
 */
$(function(){
	/*选择权限*/
	$(":checkbox").click(function(){
	    var val = $(this).val();
	    var firstOne = $(this).parent(".role_list").find(":checkbox").first();
	    if(val == 1){
	        if($(this).attr("checked") == 'checked'){
	        	$(":checkbox").each(function(){
	        	    $(this).attr("checked", "checked");
	            });
	        }else{
	        	$(":checkbox").each(function(){
	        	    $(this).attr("checked", false);
	            });
	        }
	    }else if(val == $(this).parent(".role_list").find(":checkbox").first().val()){
	    	if($(this).attr("checked") == 'checked'){
	        	$(this).nextAll().each(function(){
	        		$(this).attr("checked", "checked");
	            });
	        }else{
	        	$(this).nextAll().each(function(){
	        		$(this).attr("checked", false);
	            });
	        }
	    }else{
	        var related = $(this).attr('related');
	    	if(related){
	    		if($(this).attr("checked") == "checked"){
	            	if($(".role_list").find(":checked[value='"+related+"']").length <= 0){
	            		$(this).attr("checked", false);
	            		alert("有相关联的权限未开启，请先开启！");
	            	}
	    		}else{
	    			firstOne.attr("checked", false);
	    		}
	        }else{
	        	if($(this).attr("checked") != "checked"){
	            	if(confirm("如果取消当前选项，则与之相关联的选项也将被取消，是否继续？")){
	            	    $(".role_list").find("[related='"+$(this).val()+"']").each(function(){
	            	        $(this).attr("checked", false);
	                	});
	            	    firstOne.attr("checked", false);
	                }else{
	                	$(this).attr("checked", "checked");
	                }
	            }
	        }
	    }
	
	    var countThisAll = $(this).parent(".role_list").find(":checkbox").length;
	    var countThisChk = $(this).parent(".role_list").find(":checked").length;
	    if(firstOne.val() != 1 && firstOne.attr("checked") != 'checked' && countThisAll == countThisChk+1){
	    	firstOne.attr("checked", 'checked');
	    }
	
	    if($(".role_list").find(":checkbox").length == $(".role_list").find(":checked").length+1){
	    	$(".role_list").find("[value='1']").attr("checked", 'checked');
	    }else if($(".role_list").find(":checkbox").length > $(".role_list").find(":checked").length+1){
	    	$(".role_list").find("[value='1']").attr("checked", false);
	    }
	
	});
})