function pegaArquivo(files){
	var file = files[0];
	const fileReader = new FileReader();
	fileReader.onloadend = function(){
		$("#imgUp").attr("src", fileReader.result);
	}
	fileReader.readAsDataURL(file);
	
}