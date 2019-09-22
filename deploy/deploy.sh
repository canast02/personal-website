#!/bin/bash
set -x # Show the output of the following commands (useful for debugging)

if [ $TRAVIS_BRANCH == 'master' ] ; then
    # Remove unnecessary files.
    git rm -rf deploy-key.enc deploy README.md
    git commit -m "removed unnecessary"

    # Initialize a new git repo, and push it to our server.
    git init
    git remote add deploy "deploy@canastas.info:/var/www/canastas.info"
    git config user.name "Travis CI"
    git config user.email "chrysovalantis.anastasiou+travisci@gmail.com"

    git add .
    git commit -m "Deploy"
    git push --force deploy master
else
    echo "Not deploying, since this branch isn't master."
fi