package codethecity7;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class Categories {
	
	private static Map<Integer, String> catMap = new HashMap<Integer, String>(){{
	    put(0, "Anxiety");
	    put(1, "Dementia");
	}};
	
	public static Map<Integer, String> getCategories(){
		return catMap;
	}
	
	public String toString() {
        StringBuilder sb = new StringBuilder();
        Iterator<java.util.Map.Entry<Integer, String>> iter = catMap.entrySet().iterator();
        while (iter.hasNext()) {
            java.util.Map.Entry<Integer, String> entry = iter.next();
            sb.append(entry.getKey()+1);
            sb.append('=').append('"');
            sb.append(entry.getValue());
            sb.append('"');
            if (iter.hasNext()) {
                sb.append("/n");
            }
        }
        return sb.toString();
    }
}

