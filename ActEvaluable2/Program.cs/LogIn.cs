public class LogIn{

    private List<Usuario> usuariosRegistrados;

    public LogIn(){
        usuariosRegistrados = new List<Usuario>();
    }

    public bool RegistrarUsuario(string correo, string contraseña){
        if (usuariosRegistrados.Any( u => u.Correo == correo)) // Uso de Any en lugar de Exists
        {
            Console.WriteLine("El correo ya existe.");
            return false;
        }
        usuariosRegistrados.Add(new Usuario(correo, contraseña));
            Console.WriteLine("Usuario registrada correctamente.");
            return true;
    }

public Usuario? IniciarSesion(string correo, string contraseña){
    Usuario? usuarioEncontrado = null; // ? Permitir valores null 
    foreach (var usuario in usuariosRegistrados){
        if (usuario.Correo == correo){
            usuarioEncontrado = usuario;
            break;
        }
    }
        if (usuarioEncontrado == null){
            Console.WriteLine("Correo incorrecto.");
            return null;
        }

        if(usuarioEncontrado.Contraseña != contraseña){
            Console.WriteLine("Contraseña incorrecta.");
            return null;
        }
        Console.WriteLine("Sesion iniciada correctamente.");
            return usuarioEncontrado;
 }
}