package codethecity7;

import java.util.ArrayList;

public class CategoryChoice {
	
	public static Object categoryChoice(String issue){
		
		String category = "";
		ArrayList<String> categoryList = new ArrayList<String>(); 
		
		if (issue.toLowerCase().contains("anxious") || issue.toLowerCase().contains("stress") || issue.toLowerCase().contains("stressed") || issue.toLowerCase().contains("worry") || issue.toLowerCase().contains("worried") || issue.toLowerCase().contains("anxiety") || issue.contains("1")){
			//categoryList.add("0");
			category = "Anxiety";
			categoryList.add("Anxiety");
		}
		
		if (issue.toLowerCase().contains("memory") || issue.toLowerCase().contains("mental illness") || issue.toLowerCase().contains("dementia") || issue.contains("2")){
			//categoryList.add("1");
			category = "Dementia";
			categoryList.add("Dementia");
		}
		
		if (category.equals("")){
			category = "None";
			categoryList.add("None");
		}
		
		return categoryList;
		//return category;
	}

}
