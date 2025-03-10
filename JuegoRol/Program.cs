public class Program{

    public static void Main(String[] args){

        Console.WriteLine("****** Juego de Rol ******");

    /*     List<Habilidad> lista =new List<Habilidad>();
        List<Habilidad> lista2 =new List<Habilidad>();

        lista.Add(new Habilidad("Superfuerza",3,12));
        lista2.Add(new Habilidad("Velocidad",2,50));
        lista.Add(new Habilidad("Rayo laser",3,70));
        lista.Add(new Habilidad("Disparo",1,10));
        lista2.Add(new Habilidad("Sabiduria",4,60));

        Jugador jugadorUno = new Jugador("York",9,7);
        Jugador jugadorDos = new Jugador("Havarti",7,8,lista2);
        Jugador jugadorTres = new Jugador("Iberico",10,8,lista);

        jugadorUno.ListarHabilidades();
        jugadorDos.ListarHabilidades();
        jugadorTres.ListarHabilidades(); 

        Enemigo enemigo = new Enemigo("Enemigo1", 100, 150);
       enemigo.poder = 123;
        enemigo.mostrarDatos();
*/ 
        EnemigoAgua enemigoAgua = new EnemigoAgua("EnemigoAGUA", 100, "Tornado");
        EnemigoFuego enemigoFuego = new EnemigoFuego("EnemigoFUEGO", 100,40,60, "Llamarada");
        //enemigoAgua.mostrarDatos();
        //enemigoFuego.mostrarDatos();

        List<Enemigo> listaEnemigos = new List<Enemigo>();
        listaEnemigos.Add(enemigoAgua);
        listaEnemigos.Add(enemigoFuego);
        
        foreach (var item in listaEnemigos){
            //si es enemigofuego
            if(item.GetType() == typeof(EnemigoFuego)){
                ((EnemigoFuego)item).realizarSanacionFuego();
            }else if(item.GetType() == typeof(EnemigoAgua)){
                ((EnemigoAgua)item).realizarSanacionAgua();
            }
                item.mostrarDatos();
            }

    }

}