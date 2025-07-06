package Services;
import Models.Module;
import java.util.*;

public class ModuleService {
    private List<Module> modules = new ArrayList<>();

    public Module ajouterModule(String nom, int nbHeures) {
        Module m = new Module(nom, nbHeures);
        modules.add(m);
        return m;
    }

    public void ajouterModule(Module m) {
        modules.add(m);
    }

    public List<Module> listerModules() {
        return modules;
    }

    public Module chercherParId(int id) {
        for (Module m : modules) {
            if (m.getIdModule() == id) return m;
        }
        return null;
    }
}
