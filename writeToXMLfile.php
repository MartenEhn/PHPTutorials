<?php 
  $database = array(); 
  $database [] = array( 
  'username' => 'starman', 
  'password' => crypt('gk','rl'), //Kryptera med enkel DES och saltet 'rl' 
  'host' => "localhost",
  'port' => "3306"
  ); 
  $database [] = array( 
  'username' => 'Marten', 
  'password' => crypt ('Losenord', 'rl'),
  'host' => "localhost",
  'port' => "3306"		
  ); 
   
  $doc = new DOMDocument(); 
  $doc->formatOutput = true; 
   
  $r = $doc->createElement( "application" ); 
  $doc->appendChild( $r ); 
   
  foreach( $database as $user ) 
  { 
  $b = $doc->createElement( "db_database" ); 
   
  $name = $doc->createElement( "db_username" ); 
  $name->appendChild( 
  $doc->createTextNode( $user['username'] ) 
  ); 
  $b->appendChild( $name ); 
   
  $pass = $doc->createElement( "db_password" ); 
  $pass->appendChild( 
  $doc->createTextNode( $user['password'] ) 
  ); 
  $b->appendChild( $pass ); 
   
  $host = $doc->createElement( "db_host" ); 
  $host->appendChild( 
  $doc->createTextNode( $user['host'] ) 
  ); 
  $b->appendChild( $host ); 
   
  $r->appendChild( $b ); 
 
   
  
  //Lägg in port-nummer
  $port = $doc->createElement( "db_port" );
  $port->appendChild(
  		$doc->createTextNode( $user['port'] )
  		);
 $b->appendChild( $port );
   
  $r->appendChild( $b );
  }//Slut foreach
  
  echo $doc->saveXML(); 
  $doc->save("write2.xml"); 
  ?>