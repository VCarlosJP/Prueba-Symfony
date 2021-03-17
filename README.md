# Resolución Prueba Técnica

Proyecto BackEnd: https://github.com/VCarlosJP/Prueba-Symfony/tree/develop

Proyecto FrontEnd: https://github.com/VCarlosJP/Prueba-ReactJS/tree/develop


### Indice

- [Enunciado](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#enunciado)
- [Instalación de Proyecto](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#instalaci%C3%B3n-de-proyecto)
- [Desarrollo de Aplicación React](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#desarrollo-de-aplicaci%C3%B3n-react)
  - [Rutas disponibles](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#rutas-disponibles)
  - [Estrucura de Componentes](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#estructura-de-componentes)
  - [Dependencias descargadas](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#dependencias-descargadas)
- [Desarrollo de API Symfony](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#desarrollo-de-api-symfony)
  - [Manejo de Autenticación](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#manejo-de-autenticaci%C3%B3n)
  - [Rutas API](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#rutas-api)
    - [Registrar un nuevo usuario (/register)](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#registrar-un-nuevo-usuario-register)
    - [Loguear usuario (/api/login_check)](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#loguear-usuario-apilogin_check)
    - [Mediciones (/api/measurements)](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#mediciones-apimeasurements)
    - [Tipos Vino](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#tipos-vino)
    - [Variedades Vino](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#variedades-vino)
  - [Testing](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#testing)
  - [Dependencias Descargadas](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#dependencias-descargadas-1)
  - [Posibles Mejoras](https://github.com/VCarlosJP/Prueba-Symfony/tree/develop#posibles-mejoras)


### Enunciado

- **Symfony**: crear el proyecto e implementar servicios de */login,* */**registry* y */measurements* además de modelar la base de datos.
- **React**: Implementar una primera pantalla de login a la cual se accederá cuando  no estás logueado y una pantalla de home solo se podrá acceder cuando  estás logueado. La pantalla de home deberá mostrar un listado de  mediciones recuperadas a través del servicio de */measurements*.

**Las especificaciones de la prueba son las siguientes:**

Se quiere implementar un sistema para realizar mediciones de las  diferentes propiedades de los vinos a través de un sistema informático.  Los usuarios deben de ser capaces de registrarse y acceder al sistema a  través de un sistema de autenticación. Por último cada usuario podrá añadir una medición del vino con  los siguientes datos: 

- *Año (número)*
- *Variedad (desplegable)*
- *Tipo (desplegable)*
- *color: string,*
- *temperatura: número*
- *graduación: número*
- *ph: número*
- *observaciones: string*

**En la prueba se valorará:**

- Aplicación de buenas prácticas de código.
- Arquitectura de software.
- Testing

## Instalación de Proyecto

Una vez clonados ambos proyectos, al realizar las migraciones de la base de datos es necesario ingresar por lo menos un registro en las tablas: mediciones_tipo_vino y mediciones_variedad_vino. Insertar estos valores son necesarios para poder tener tipos y variedades en los selects de la aplicación del front.

## Desarrollo de Aplicación React

Para este ejercicio se ha desarrollada una aplicación sencilla utilizando la librería ReactJS, cumpliendo con las funcionalidades requeridas y así como también manteniendo un diseño completamente *Responsive*.

### **Rutas disponibles**

- /login
- /register
- /home

<p align="center"><img src="https://user-images.githubusercontent.com/49984008/107410392-8977aa80-6b0d-11eb-8772-245148e7b34e.png" alt="image-20210209150023177" style="zoom: 67%;" /><img src="https://user-images.githubusercontent.com/49984008/107410454-9eecd480-6b0d-11eb-9e9f-990c05d62e0f.png" alt="image-20210209152917037" style="zoom:67%;" />

![image](https://user-images.githubusercontent.com/49984008/107413669-4ae3ef00-6b11-11eb-8996-ecb0ed168121.png)

### **Estructura de componentes:**

- **Auth**

  Contiene funciones para verificar y cambiar el estado de un usuario (si esta autenticado no).

- **AuthFormComponent**

  Encargado de permitir al usuario acceder al sistema o crearse una credencial.

- **HomeComponent**

  Componente padre que funciona como contenedor de las dos acciones principales del sistema. También es el que manda a traer de base de datos todas las mediciones existentes, los tipos y variedades de vinos.

  - **FormComponent**

    Componente hijo que permite, por medio de un formulario, crear una nueva medición.

  - **MeasurementComponent**

    Componente hijo que se encarga de renderizar una tabla con todas las mediciones existentes de la base de datos.

- **NotFoundComponent**

  En caso que un usuario ingrese en el navegador una ruta que no corresponda a ninguna de las funcionalidades, se mostrar un componente con un mensaje ***NotFound***.

- **protected**

  Es un componente utilizado en conjunto con las rutas de React Router. Cuando un usuario trate de ingresar a una ruta protegida ('/home'), protected verificara si el usuario esta autenticado, en caso positivo se mostrara el componente consultado, en caso negativo se prohibirá el acceso a la ruta.

### **Dependencias descargadas:**

- node-sass
- prettier
- react-router-dom

## Desarrollo de API Symfony

En base a los requisitos planteados, se ha diseñado el siguiente diagrama representando la base de datos a trabajar.

![image](https://user-images.githubusercontent.com/49984008/107413836-84b4f580-6b11-11eb-9fc9-37e803eff3b3.png)

Posteriormente para este proyecto, se ha utilizado Doctrine, el ORM de Symfony, para poder crear cada una de las entidades, con sus atributos, tipos y relaciones correspondientes. Todo esto en una base de datos ***MySQL***.

### Manejo de Autenticación

Symfony incluye diferentes opciones para manejar la seguridad. En este caso se ha utilizado una librería externa para manejar la autenticación mediante ***JSON Web Tokens***. 

La única forma de poder acceder a las rutas principales de nuestra API es mediante el envió de un token en el header de la petición que le hacemos a una ruta.

Cuando un usuario hace login, si sus credenciales son validas, la API le devuelve su propio token para poder utilizarlo en sus próximas peticiones. 

### Rutas API

#### Registrar un nuevo usuario (/register)

```
Method: POST
url:/register
body: {"email":"carlos@gmail.com, "password":123}

response:{"message": "User Created Succesfully","statusCode": 200}
```

#### Loguear usuario (/api/login_check)

```
Method: POST
url:/api/login_check
body: {"username":"carlos@gmail.com, "password":123}

response:{"token": "TOKENCOMPLETO"}
```

#### Mediciones (/api/measurements)

```
Method: GET
url:/api/measurements
Headers: {"Content-Type":"application-json", Authorization":"Bearer {GENERATED_TOKEN}"}

response:[
    {
        "id": 1,
        "ano": 1982,
        "color": "Rojo",
        "temperatura": 22,
        "graduacion": 12,
        "ph": 4,
        "observaciones": "Observaciones..",
        "variedad": {
            "id": 1,
            "nombre": "Variedad1"},
        "tipo": {
            "id": 1,
            "nombre": "Tipo1"}
        }, ...
]
```

```
Method: POST
url:/api/measurements
Headers: {"Content-Type":"application-json", Authorization":"Bearer {GENERATED_TOKEN}"}
body: 
    {
        "id": 2,
        "ano": 1982,
        "color": "Rojo",
        "temperatura": 22,
        "graduacion": 12,
        "ph": 4,
        "observaciones": "Observaciones..",
        "variedad": {"id": 1,"nombre": "Variedad1"},
        "tipo": {"id": 1,"nombre": "Tipo1"}
    }

Response: {"message": "Measurement Created Succesfully", "statusCode": 200}
```

#### Tipos Vino

```
Method: GET
url:/api/tipos_vino
Headers: {"Content-Type":"application-json", Authorization":"Bearer {GENERATED_TOKEN}"}

response:[ {"id": 1,"nombre":"Tipo1"}, {"id": 2,"nombre":"Tipo2"}, .... ] 
```

#### Variedades Vino

```
Method: GET
url:/api/variedades_vino
Headers: {"Content-Type":"application-json", Authorization":"Bearer {GENERATED_TOKEN}"}

response:[ {"id": 1,"nombre":"Variedad1"}, {"id": 2,"nombre":"Variedad2"}, .... ] 
```



### Testing

Haciendo uso de la librería PHP Unit, se han escrito 11 funciones de TEST para poder probar el funcionamiento esperado de nuestra API. Durante el desarrollo, todos tuvieron éxito.

Los test comprueban la protección de la API, que las peticiones sean correctas y que devuelvan el contenido que se planteo en el inicio del proyecto.

Se han programado los siguientes Test para cada uno de los cuatro controladores que conforman el proyecto:

- **UserController**
  - createAuthenticatedClient()
  - testAccessingProtectedRouteAthenticatedClient()
  - testAccessingProtectedRouteNoAuthenticatedClient()
  - testRegisterUser()
  - testRegisterUserAlreadyExist()
- **MedicionesVinoController**
  - testGetMeasurementsRequest()
  - testGetExpectedMeasurements()
  - testAddMeasurement()
- **MedicionesVariedadVinoController**
  - testGetVariedadesVinosRequest()
  - testGetVariedadesVinosResponse()

- **MedicionesTipoVinoController**

  - testGetTiposVinosRequest()
  - testGetTiposVinosResponse()


### Dependencias descargadas:

- doctrine/doctrine-bundle

- doctrine/orm

- lexik/jwt-authentication-bundle

- nelmio/cors-bundle

- symfony/flex

- symfony/browser-kit

- symfony/maker-bundle

- symofny/phpunit-bridge

  

## Posibles Mejoras

- Realizar test de componentes a la aplicación de React.
- Utilizar HTTPOnly Cookies para gestionar los Tokens y así mejorar la seguridad.
- Implementar exception handlers a los controladores.
