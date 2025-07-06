package Views;

import java.util.List;
import java.util.Scanner;

public class MenuUtils {
    // Scanner unique, public static final, à réutiliser partout
    public static final Scanner SCANNER = new Scanner(System.in);

    public static int afficherMenu(String titre, List<String> options) {
        System.out.println("\n=== " + titre + " ===");
        for (int i = 0; i < options.size(); i++) {
            System.out.println((i + 1) + ". " + options.get(i));
        }
        int choix = -1;
        do {
            System.out.print("Votre choix : ");
            if (SCANNER.hasNextInt()) {
                choix = SCANNER.nextInt();
                SCANNER.nextLine(); // Consommer le retour à la ligne
            } else {
                System.out.println("Saisie invalide ! Entrez un nombre.");
                SCANNER.nextLine(); // Vider la saisie erronée
                choix = -1;
            }
            if (choix < 1 || choix > options.size()) {
                System.out.println("Choix invalide !");
            }
        } while (choix < 1 || choix > options.size());
        return choix;
    }
}
