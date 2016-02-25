document.addEventListener( "plusready",  plusReady, true );
//document.addEventListener( "onload",  onLoad, false );

function plusReady(){
	//document.addEventListener( "onload",  onLoad, false );

	var _BARCODE = 'plugintest',
		B = window.plus.bridge;
	var plugintest =
	{
		PluginCommandsFunction : function (Argus1,  successCallback, errorCallback )
		{
			var success = typeof successCallback !== 'function' ? null : function(args)
				{
					successCallback(args);
				},
				fail = typeof errorCallback !== 'function' ? null : function(code)
				{
					errorCallback(code);
				};
			callbackID = B.callbackId(success, fail);

			return B.exec(_BARCODE, "PluginCommandsFunction", [callbackID, Argus1]);
		},
		PluginGetCityIdFunction : function (Argus1,  successCallback, errorCallback )
		{
			//alert("PluginGetCityIdFunction");
			var success = typeof successCallback !== 'function' ? null : function(args)
				{
					successCallback(args);
				},
				fail = typeof errorCallback !== 'function' ? null : function(code)
				{
					errorCallback(code);
				};
			callbackID = B.callbackId(success, fail);

			return B.exec(_BARCODE, "PluginGetCityIdFunction", [callbackID,Argus1]);
		}
	};


	window.plus.plugintest = plugintest;

}



function getCommondGoods(){
	$.get("http://jkd2.shutung.com:81/App/v3/Ad/commendGoods",function(res){
		alert(json.total);
	},"jsonp");
}

