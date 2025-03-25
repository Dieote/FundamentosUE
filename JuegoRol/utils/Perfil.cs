public record Perfil(string Nombre, double nivelDanio, double nivelDefensa){

    public static readonly Perfil jefe = new Perfil("Jefe", 7, 0.5);
    public static readonly Perfil casual = new Perfil("Enemigo casual", 2, 0.3);
    public static readonly Perfil complejo = new Perfil("Enemigo complejo", 4, 0.3);
}