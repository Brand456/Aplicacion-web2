<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, name, password FROM registro WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  

  $user = null;
   
if (count($results) > 0) {
    $user = $results;
}
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<?php if(!empty($user)): ?>
      <br> Hola. <?= $user['name']; ?>
      <br> Porfavor llene la tabla
    <?php else: ?>
      <h1>Porfavor inicie sesion o registrese</h1>
    <?php endif; ?>
    
    <div class="container">
      <br/>
      <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="javascript:void(0);" method="post" onsubmit = "aplicacion.Actualizar()">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar registro </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">ID:</label>
                            <input type="text"
                              class="form-control" name="idEditar" id="idEditar" aria-describedby="helpId" placeholder="ID">
                        
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Clavenombre:</label>
                            <input type="text"
                              class="form-control" name="nombreEditar" id="nombreEditar" aria-describedby="helpId" placeholder="Clavenombre">
                        
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Peso:</label>
                            <input type="text"
                              class="form-control" name="pesoEditar" id="pesoEditar" aria-describedby="helpId" placeholder="Medida">
                        
                          </div>
      
                          <div class="mb-3">
                            <label for="" class="form-label">Hora:</label>
                            <input type="text"
                              class="form-control" name="horaEditar" id="horaEditar" aria-describedby="helpId" placeholder="Hora">
                           
                          </div>
      
                          <div class="mb-3">
                              <label for="" class="form-label">Fecha:</label>
                              <input type="text"
                                class="form-control" name="fechaEditar" id="fechaEditar" aria-describedby="helpId" placeholder="Fecha">
                              
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            
            <div class="card">
                <div class="card-header">
                    Datos del peso
                </div>
                <div class="card-body">
                   <form action="javascript:void(0);" method="post" onsubmit = "aplicacion.agregar()">

                   <div class="mb-3">
                      <label for="" class="form-label">Clave:</label>
                      <input type="text"
                        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Clavenombre">
                  
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Peso:</label>
                      <input type="text"
                        class="form-control" name="peso" id="peso" aria-describedby="helpId" placeholder="Peso">
                  
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Hora:</label>
                      <input type="text"
                        class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="Hora">
                     
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Fecha:</label>
                        <input type="text"
                          class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha">
                        
                      </div>

                      <button type="submit" class="btn btn-primary">Tomar nuevo registro</button>
                   </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Clave</th>
                        <th>Peso</th>
                        <th>Hora</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id = "pesoC">

                   
                </tbody>
            </table>
            
        </div>
            
      </div>
    
    </div>

<script>
    var url = "http://localhost/Aplicacion%20web/peso/";
    var modal = new bootstrap.Modal(document.getElementById('modelId'),{Keyboard:false});

   var aplicacion = new function()
   {
       this.idEditar = document.getElementById("idEditar");
       this.pesoEditar = document.getElementById("pesoEditar");
       this.horaEditar = document.getElementById("horaEditar");
       this.fechaEditar = document.getElementById("fechaEditar");
       this.nombreEditar = document.getElementById("nombreEditar");
      
       this.nombre = document.getElementById("nombre");
       this.peso = document.getElementById("peso");
       this.hora = document.getElementById("hora");
       this.fecha = document.getElementById("fecha");

       this.pesoC = document.getElementById("pesoC");

       this.Leer= function()
       {
           var datos="";

           fetch(url)
           .then(r=>r.json())
           .then((respuesta)=>{
               console.log(respuesta);

               respuesta.map(
                   function(pesoC,index,array)
                   {
                       datos+="<tr>";
                       datos+="<td>"+pesoC.id+"</td>";
                       datos+="<td>"+pesoC.nombre+"</td>";
                       datos+="<td>"+pesoC.peso+"</td>";
                       datos+="<td>"+pesoC.hora+"</td>";
                       datos+="<td>"+pesoC.fecha+"</td>";
                       datos+='<td> <div class="btn-group" role="group" aria-label=""><button type="button" class="btn btn-info" onclick="aplicacion.Editar('+pesoC.id+')">Editar</button><button type="button" class="btn btn-danger" onclick="aplicacion.Borrar('+pesoC.id+')">Borrar</button></div>'+'</td>';
                       datos+="</tr>";
                       
                   }
               );

               return this.pesoC.innerHTML = datos;
           })
           .catch(console.log);

           //datos= " <tr> <td>Id</td><td>110 mg</td><td>8.56 pm</td><td>25/02/2022</td><td>Editar|Borrar</td></tr>"
        
       };
       this.agregar= function()
       {
           console.log(peso.value);
           console.log(nombre.value);
           console.log(hora.value);
           console.log(fecha.value);

           var datosEnviar = {peso:this.peso.value, nombre:this.nombre.value, hora:this.hora.value, fecha:this.fecha.value}
           
            fetch(url+"?insertar=1", {method:"POST", body:JSON.stringify(datosEnviar)} ) 
           .then(respuesta=>respuesta.json())
           .then((datosRespuesta)=>{
               console.log("Insertados");
               this.Leer();
           })
           .catch(console.log);
          
       };

       this.Borrar = function(id)
       {
           console.log(id);

           fetch(url+"?borrar="+id ) 
           .then(respuesta=>respuesta.json())
           .then((datosRespuesta)=>{
               this.Leer();
           })
           .catch(console.log);
       };

       this.Editar = function(id)
       {
           console.log(id);
           fetch(url+"?consultar="+id ) 
           .then(respuesta=>respuesta.json())
           .then((datosRespuesta)=>{
               this.idEditar.value= datosRespuesta[0]['id']
               this.pesoEditar.value= datosRespuesta[0]['peso']
               this.horaEditar.value= datosRespuesta[0]['hora']
               this.fechaEditar.value= datosRespuesta[0]['fecha']
           })
           .catch(console.log);
           modal.show();
       };

       this.Actualizar = function()
       {
           var datosEnviar = {id:this.idEditar.value, nombre:this.nombreEditar.value, peso:this.pesoEditar.value, hora:this.horaEditar.value, fecha:this.fechaEditar.value}
           fetch(url+"?actualizar=1", {method:"POST", body:JSON.stringify(datosEnviar)} ) 
           .then(respuesta=>respuesta.json())
           .then((datosRespuesta)=>{
               console.log("Actualizar");
               this.Leer();
               modal.hide();
           })
           .catch(console.log);
           
       }

   }

   aplicacion.Leer();
</script>
</body>
</html>