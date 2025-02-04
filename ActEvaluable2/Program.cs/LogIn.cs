public class LogIn{

    private List<Usuario> usuariosRegistrados;

    public LogIn(){
        usuariosRegistrados = new List<Usuario>();
    }

    public bool RegistrarUsuario(string correo, string contraseña){
        if (usuariosRegistrados.Exists( u => u.Correo == correo))
        {
            Console.WriteLine("El correo ya existe.");
            return false;
        }
        usuariosRegistrados.Add(new Usuario(correo, contraseña));
            Console.WriteLine("Usuario registrada correctamente.");
            return true;
    }

public Usuario IniciarSesion(string correo, string contraseña){
    foreach (var usuario in usuariosRegistrados){
        Console.WriteLine("Sesion iniciada correctamente.");
        return usuario;
    }
    Console.WriteLine("Correo o contraseña incorrecta.");
    return null;
}
}