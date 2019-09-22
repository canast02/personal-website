#!/bin/bash
set -x # Show the output of the following commands (useful for debugging)

if [ $TRAVIS_BRANCH == 'master' ] ; then
    # Initialize a new git repo in _site, and push it to our server.
    cd _site
    git init

    git remote add deploy "deploy@canastas.info:/var/www/canastas.info"
    git config user.name "Travis CI"
    git config user.email "chrysovalantis.anastasiou+travisci@gmail.com"

    # Remove unnecessary files.
    rm deploy-key.enc
    rm README.md
    rm -rf deploy

    git add .
    git commit -m "Deploy"
    git push --force deploy master
else
    echo "Not deploying, since this branch isn't master."
fi