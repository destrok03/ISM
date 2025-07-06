package Views;
import Services.ModuleService;
import Models.Module;
import java.util.*;
public class ModuleView {
    private ModuleService moduleService;

    public ModuleView(ModuleService moduleService) {
        this.moduleService = moduleService;
    }

    public void menu() {
        List<String> options = Arrays.asList(
                "Ajouter un module",
                "Lister les modules",
                "Retour"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("GESTION DES MODULES", options);
            switch (choix) {
                case 1:
                    Scanner sc = new Scanner(System.in);
                    System.out.print("Nom du module : ");
                    String nom = sc.nextLine();
                    System.out.print("Nombre d'heures : ");
                    int nbHeures = sc.nextInt();
                    sc.nextLine();
                    Module m = moduleService.ajouterModule(nom, nbHeures);
                    System.out.println("Module ajouté avec ID : " + m.getIdModule());
                    break;
                case 2:
                    for (Module mo : moduleService.listerModules()) {
                        System.out.println(mo);
                    }
                    break;
            }
        } while (choix != 3);
    }
}
