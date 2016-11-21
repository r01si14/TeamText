package codethecity7;

import java.io.IOException;

public class Main {

	static String issue;
	static String place;
	
	public static void main(String[] args) throws IOException {
		issue = Greeting.greeting();	
		place = Location.location();
		
		System.out.println("You are in " + place + " and you want to know about " + issue + ".");
	}
}
