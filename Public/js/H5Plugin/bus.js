document.addEventListener( "plusready",  plusReady, true );
//document.addEventListener( "onload",  onLoad, false );

function plusReady(){
	//document.addEventListener( "onload",  onLoad, false );

	var _BARCODE = 'pluginkangcun',
		B = window.plus.bridge;
	var pluginkangcun =
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
		}
	};


	window.plus.pluginkangcun = pluginkangcun;

}





