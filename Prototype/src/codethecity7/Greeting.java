package codethecity7;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Map;

public class Greeting {	
	
	public static String greeting() throws IOException{
		
		String category = "None";
		ArrayList<String> categoryList = new ArrayList<String>();
		Map<Integer, String> catMap = Categories.getCategories();

		System.out.println("Hello.");
		
		while (category.equals("None")){
			
			System.out.println("Which issue would you like help with?  For a list of categories, please type CATEGORIES. To start again, please type RESTART.");
			
		    BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
			category = reader.readLine();
		
			if (category.toLowerCase().contains("restart")){
				Main.main(null);
			}
			else if (category.toLowerCase().contains("categories")){
				Map<Integer, String> cat = Categories.getCategories();
							
				for (int i=0;i<cat.size();i++){
					System.out.println(i+1 + ": " + cat.get(i));
				}
			}
			
			//category = (String) CategoryChoice.categoryChoice(category);

			categoryList = (ArrayList<String>) CategoryChoice.categoryChoice(category);
			
			if (categoryList.size()==1 && categoryList.get(0).equals("None")){
				category = "None";			
			}
			else if(categoryList.size()==1 && !categoryList.get(0).equals("None")) 
			{
				category = categoryList.get(0);
			}
			else if(categoryList.size()>1){
				System.out.println("Please choose from one of the following options.");
				for (int i=0;i<categoryList.size();i++){
					System.out.println(i+1 + ": " + categoryList.get(i));
				}
				category = "None";
			}
			else{
				category = "help";
			}
		}
		
		return category;
	}
}
