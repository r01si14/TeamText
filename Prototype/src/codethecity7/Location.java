package codethecity7;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Location {
	
public static String location() throws IOException{
		
		String location = "";
		
		while (location.equals(""))
		{
			System.out.println("Which city are you in?");
				
			BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
			location = reader.readLine();			
		}
		
		if (location.toLowerCase().equals("restart"))
		{
			Main.main(null);
		}
		
		return location;
	}

}
