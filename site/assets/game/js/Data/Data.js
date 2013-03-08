(function (SC) {
	SC.Data = {}; // Namespace des données
	
	SC.Data.ENV = {}; // Environnement synchronisé avec le serveur
	
	//MAP
	//SC.Data.ENV.map;
	
	SC.Data.ENV.characters = new Array();
	SC.Data.ENV.ressources = new Array();
	
	//{"t1x":16, "t1y": 3, "t2x":0, "t2y":0, "blocked":false,"action":""}
	SC.Data.ENV.mapConvertor = function (map) {
		var i,j;
		var map = SC.Data.ENV.map;
		var newMap = new Array();
		var l = map.length;
		var c = map[0].length;
		
		for(i=0;i<l;i++) {
			newMap.push(new Array());
			for(j=0;j<c;j++)
				newMap[i][j]={
					"t1x":map[i][j][0],
					"t1y":map[i][j][1],
					"t2x":0,
					"t2y":0,
					"blocked":false,
					"action":""
				};
		}
		document.body.innerHTML = JSON.stringify(newMap);
	};
})(SC);