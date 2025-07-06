package Views;

import Services.StatistiqueService;
import Services.AnneeScolaireService;
import Models.AnneeScolaire;
import java.util.List;
import java.util.Scanner;

public class StatistiqueView {
    private StatistiqueService statistiqueService;
    private AnneeScolaireService anneeScolaireService;

    public StatistiqueView(StatistiqueService statistiqueService, AnneeScolaireService anneeScolaireService) {
        this.statistiqueService = statistiqueService;
        this.anneeScolaireService = anneeScolaireService;
    }

    public void menu() {
        List<String> options = java.util.Arrays.asList(
                "Effectif total d'une année",
                "Effectif par classe et année",
                "Retour"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("STATISTIQUES", options);
            Scanner sc = new Scanner(System.in);
            switch (choix) {
                case 1:
                    System.out.print("Année scolaire (ex: 2023-2024) : ");
                    String libelle = sc.nextLine();
                    AnneeScolaire annee = anneeScolaireService.trouverOuCreerAnnee(libelle);
                    System.out.println("Effectif total : " + statistiqueService.effectifParAnnee(annee));
                    break;
                case 2:
                    System.out.print("ID classe : ");
                    int idClasse = sc.nextInt(); sc.nextLine();
                    System.out.print("Année scolaire (ex: 2023-2024) : ");
                    String libelle2 = sc.nextLine();
                    AnneeScolaire annee2 = anneeScolaireService.trouverOuCreerAnnee(libelle2);
                    System.out.println("Effectif dans la classe : " + statistiqueService.effectifParClasse(idClasse, annee2));
                    break;
            }
        } while (choix != 3);
    }
}
