#!/bin/bash

CMD=$1

IMAGE_TAG=latest

IMAGE_NAME="mamat08nurahmat/mattools"

CONTAINER_NAME="mattools"
CONTAINER_NAME_DEV="mattools_dev"


case $CMD in
    build)
        docker build -t  $IMAGE_NAME .
        ;;

    push)
        CMD="docker push"
        CMD="$CMD $IMAGE_NAME:$IMAGE_TAG"
        echo "$CMD"
        eval $CMD
        ;;

    rmi)
        docker rmi -f $IMAGE_NAME
        ;;

    pull)
        CMD="docker pull"
        CMD="$CMD $IMAGE_NAME:$IMAGE_TAG"
        echo "$CMD"
        eval $CMD
        ;;

    remove)
        docker rm -f $CONTAINER_NAME
        ;;

    start)
        CMD="docker run"
        CMD="$CMD -d"
        CMD="$CMD --name $CONTAINER_NAME"
        CMD="$CMD -p 81:80"
        CMD="$CMD -td $IMAGE_NAME:$IMAGE_TAG"
        echo "$CMD"
        eval $CMD
        ;;

    start_dev)
        CMD="docker run"
        CMD="$CMD -d"
        CMD="$CMD -v "${PWD}:/var/www/html""
        CMD="$CMD --name $CONTAINER_NAME_DEV"
        CMD="$CMD -p 8181:80"
        CMD="$CMD -td $IMAGE_NAME:$IMAGE_TAG"
        echo "$CMD"
        eval $CMD
        ;;

    stop)
        docker stop $CONTAINER_NAME
        ;;
        
    stop_dev)
        docker stop $CONTAINER_NAME_DEV
        ;;
        

    remove_dev)
        docker rm -f $CONTAINER_NAME_DEV
        ;;

    code)
        CMD="docker rm -f code3333"
        CMD="docker run -d -p 3333:8443 -v "${PWD}:/home/coder/project" --name code3333 codercom/code-server --allow-http --no-auth"
        echo "$CMD"
        eval $CMD
        ;;

   

    *)
        echo "Usage : build | start <image_tag> | stop | remove | rmi"
        ;;
esac

exit 0
