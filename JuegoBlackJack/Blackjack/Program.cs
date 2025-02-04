
class Program
{
    static void Main(string[] args)
    {
    Console.WriteLine("Aplicacion de BlackJack!");

Baraja barajaNew = new Baraja();
barajaNew.Barajar();

Jugador jugador1 = new Jugador("Jugador Principal.");
Jugador crupier = new Jugador("*Crupier*");

jugador1.RecibirCarta(barajaNew.RepartirCarta());
jugador1.RecibirCarta(barajaNew.RepartirCarta());
crupier.RecibirCarta(barajaNew.RepartirCarta());
crupier.RecibirCarta(barajaNew.RepartirCarta());

// Mostrar las cartas del jugador
        Console.WriteLine("\nTu mano:");
        Console.WriteLine(jugador1.ToString());
        Console.WriteLine($"Crupier muestra carta: {crupier.Mano[0]}");

        while(true){
            Console.Write("Quieres otra carta? S/N: ");
            string respuesta = Console.ReadLine() ?? "".ToLower();

            if(respuesta == "s"){
            jugador1.RecibirCarta(barajaNew.RepartirCarta());
            Console.WriteLine(jugador1.ToString());
                if(jugador1.SuperaPuntaje()){
                    Console.WriteLine("Te pasaste de 21. ¡PERDISTE!");
                    return;
                }
            } else if(respuesta == "n"){
                break;
            }else{
                    Console.WriteLine("Ingrese valores permitidos. S/N");
                    }
            }
        
                    Console.WriteLine("Turno del Crupier.");
                    Console.WriteLine(crupier.ToString());

                    while(crupier.PedirCarta()){
                    crupier.RecibirCarta(barajaNew.RepartirCarta());
                    Console.WriteLine(crupier.ToString());

                     if(crupier.SuperaPuntaje()){
                        Console.WriteLine("El crupier se paso de 21. ¡GANASTE!");
                             return;
                                    }
                    }

        int puntajeJugador = jugador1.CalcularPuntaje();
        int puntajeCrupier = crupier.CalcularPuntaje();

    Console.WriteLine($"Puntuación final - Jugador: {puntajeJugador}, Crupier: {puntajeCrupier}");

        if (puntajeJugador > puntajeCrupier)
        {
            Console.WriteLine("¡Ganaste!");
        }
        else if (puntajeJugador < puntajeCrupier)
        {
            Console.WriteLine("¡Perdiste!");
        }
        else
        {
            Console.WriteLine("¡Es un empate!");
        }
    }

        }