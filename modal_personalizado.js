$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');

		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">REMOVER ANÚNCIO</h4></div><div class="modal-body"><p>Tem certeza que deseja remover o anúncio selecionado?</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a class="btn btn-danger" id="dataConfirmOK">Remover</a></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- /.modal -->');
		}
		$('#confirm-delete').modal({shown:true});
		$('#dataConfirmOK').attr('href', href);
		return false;
})
});