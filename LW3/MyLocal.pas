PROGRAM PrintHello(INPUT, OUTPUT);
USES
  DOS;
BEGIN {PrintHello}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('Hello world!');
  
  WRITELN('REQUEST_METHOD: ', getenv('REQUEST_METHOD'));
  WRITELN('QUERY_STRING: ', getenv('QUERY_STRING'));
  WRITELN('CONTENT_LENGTH: ', getenv('CONTENT_LENGTH'));
  WRITELN('HTTP_USER_AGENT: ', getenv('HTTP_USER_AGENT'));
  WRITELN('HTTP_HOST: ', getenv('HTTP_HOST'));
END. {PrintHello}

