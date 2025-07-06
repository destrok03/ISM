package Views;
import java.util.Arrays;
import java.util.List;
import Services.*;
public class MenuRp {
    private ClasseView classeView;
    private ProfView profView;
    private ModuleView moduleView;
    private EnseignementView enseignementView;
    private StatistiqueView statistiqueView;
    public MenuRp(
            ClasseService classeService,
            ProfService profService,
            ModuleService moduleService,
            EnseignementService enseignementService,
            StatistiqueService statistiqueService,
            AnneeScolaireService anneeScolaireService

    ) {
        this.classeView = new ClasseView(classeService);
        this.profView = new ProfView(profService);
        this.moduleView = new ModuleView(moduleService);
        this.enseignementView = new EnseignementView(enseignementService);
        this.statistiqueView = new StatistiqueView(statistiqueService, anneeScolaireService);;
    }
    public void afficher() {
        List<String> options = Arrays.asList(
                "Gérer les classes",
                "Gérer les professeurs",
                "Gérer les modules",
                "Gérer les affectations",
                "Voir les statistiques",
                "Déconnexion"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("MENU RP", options);
            switch (choix) {
                case 1: classeView.menu(); break;
                case 2: profView.menu(); break;
                case 3: moduleView.menu(); break;
                case 4: enseignementView.menu(); break;
                case 5: statistiqueView.menu(); break;
                case 6: System.out.println("Déconnexion..."); break;
            }
        } while (choix != 6);
    }
}
