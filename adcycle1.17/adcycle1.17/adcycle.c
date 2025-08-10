/* Copyright (c) 2001 AdCycle.com All rights reserved. */
#include <sys/types.h>
#include <sys/socket.h>
#include <sys/un.h>
#include <time.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>


main(){


  // CLIENT OPTIONS [UPDATE!]
  // modify these line per instructions in readme.txt
  // variables must match values as found in safe_adcycle.cgi
  
  char *sock_dir="/full/path/to/sock"; // update this
  int daemon_qty=1; // the number of daemons (1 is adequate for most sites)

  // no other mods are required in this file

  
  int sock;
  struct sockaddr_un server;
  char *string;
  char *sockpath;
  char numread;
  char buf[1024];
  char line[1024];
  int i;
  char *tmp;
  char *query=(tmp=getenv("QUERY_STRING"))?tmp:"No Query String";
  char *cookie=(tmp=getenv("HTTP_COOKIE"))?tmp:"No Cookie";
  char *remote=(tmp=getenv("REMOTE_ADDR"))?tmp:"127.0.0.1";
  char *agent=(tmp=getenv("HTTP_USER_AGENT"))?tmp:"No Agent";
  char *refer=(tmp=getenv("HTTP_REFERER"))?tmp:"No Referer";
  int len=strlen(query)+strlen(remote)+strlen(agent)+strlen(refer)+strlen(cookie)+32;
  int socklen=strlen(sock_dir)+10;
  int daemon;
  int seed=time(0)+len;
  srand(seed);  
  daemon= 1 + rand() % daemon_qty;
  string=malloc(sizeof(char)*len);
  sockpath=malloc(sizeof(char)*socklen);
  sprintf(string,"%s&remote=%s&agent=%s&refer=%s&cookie=%s\n",query,remote,agent,refer,cookie);
  sprintf(sockpath,"%s/adsock%d",sock_dir,daemon);
  sock=socket(PF_LOCAL,SOCK_STREAM,0);
  if(sock==-1){
    fprintf(stderr,"error opening stream socket\n");
    exit(1);
  }
  server.sun_family=PF_LOCAL;
  strcpy(server.sun_path,sockpath);
  if(connect(sock,(struct sockaddr *) &server,sizeof(struct sockaddr_un))==-1){
    close(sock);
    fprintf(stderr,"Error connecting stream socket. Restart safe_adcycle or check directory permissions.\n");
    fprintf(stderr,"Also, check the path to your sock dir %s\n",sockpath);
    exit(1);
  }
  write(sock,string,strlen(string));
  write(sock,"xENDx\n",sizeof("xENDx\n"));
  if (read(sock, buf, 16384) < 0) perror("reading stream message"); 
    printf("%s\n", buf);
    close(sock);
    exit(0);
  }

/* Copyright (c) 2001 AdCycle.com All rights reserved. */