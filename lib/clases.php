<?php
	
	include_once "util.php";
	

	class Reporte
	{
		var $id;
		var $id_uri;
		var $fecha;
		var $contenido;
		var $status;
		
		function Reporte($id)
		{
			$this->id=$id;
			$query=operacionSQL("SELECT * FROM Reporte WHERE id=".$id);
			$this->id_uri=mysql_result($query,0,1);
			$this->fecha=mysql_result($query,0,2);
			$this->contenido=mysql_result($query,0,3);
			$this->status=mysql_result($query,0,4);
		} 
	}
	
	
	
	
	
	
	
	
	
	
	class pointLocation 
	{
		var $pointOnVertex = true; // Checar si el punto se encuentra exactamente en uno de los vértices?
	 
		function pointLocation() 
		{
		}
	 
		function pointInPolygon($point, $polygon, $pointOnVertex = true) 
		{
			$this->pointOnVertex = $pointOnVertex;
	 
			// Transformar la cadena de coordenadas en matrices con valores "x" e "y"
			$point = $this->pointStringToCoordinates($point);
			$vertices = array(); 
			foreach ($polygon as $vertex) 
			{
				$vertices[] = $this->pointStringToCoordinates($vertex); 
			}
	 
			// Checar si el punto se encuentra exactamente en un vértice
			if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) 
			{
				return "vertex";
			}
	 
			// Checar si el punto está adentro del poligono o en el borde
			$intersections = 0; 
			$vertices_count = count($vertices);
	 
			for ($i=1; $i < $vertices_count; $i++) 
			{
				$vertex1 = $vertices[$i-1]; 
				$vertex2 = $vertices[$i];
				if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Checar si el punto está en un segmento horizontal
					return "boundary";
				}
				if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) { 
					$xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x']; 
					if ($xinters == $point['x']) { // Checar si el punto está en un segmento (otro que horizontal)
						return "boundary";
					}
					if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
						$intersections++; 
					}
				} 
			} 
			// Si el número de intersecciones es impar, el punto está dentro del poligono. 
			if ($intersections % 2 != 0) 
			{
				return "inside";
			} else 
			{
				return "outside";
			}
		}
	 
		function pointOnVertex($point, $vertices) 
		{
			foreach($vertices as $vertex) {
				if ($point == $vertex) {
					return true;
				}
			}
	 
		}
	 
		function pointStringToCoordinates($pointString) 
		{
			$coordinates = explode(" ", $pointString);
			return array("x" => $coordinates[0], "y" => $coordinates[1]);
		}
	 
}
	
	


?>