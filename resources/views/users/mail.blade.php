<!DOCTYPE html>
<html lang="es-Es">
  <head>
    <meta charset="utf-8">
  </head>
  <body style="font-family:sans-serif;">
    <h2>Registro de Usuario en GrupoPlus</h2>

    <table border="1" cellpadding="10">
      <thead>
        <tr>
          <th>Nombre de la Empresa:</th>
          <th>Teléfono Fijo:</th>
          <th>Persona de Contacto:</th>
          <th>Teléfono Celular:</th>
          <th>Email:</th>
          <th>Ciudad:</th>
          <th>RIF</th>
        </tr>
        </thead>
        <tbody>
          <tr>
              <td>{!!$company!!}</td>
              <td>{!!$telephone!!}</td>
              <td>{!!$name!!}</td>
              <td>{!!$cellphone!!}</td>
              <td>{!!$email!!}</td>
              <td>{!!$city!!}</td>
              <td>{!!$rif!!}</td>
          </tr>
        </tbody>
    </table>

  </body>
</html>