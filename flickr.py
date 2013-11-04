#!/usr/bin/env python

import simplejson as json

from urllib import urlencode
from urllib2 import urlopen
from urllib import urlretrieve
import os
import sys
def photo_url(photo, size='o'):
    url = "http://farm%s.static.flickr.com/%s/%s_%s_%s.jpg" % (photo['farm'],
                                                               photo['server'],
                                                               photo['id'],
                                                               photo['secret'],
                                                               size)
    return url

YQL_PUBLIC = 'http://query.yahooapis.com/v1/public/yql'

def yql_public(query):
    # escape query
    query_str = urlencode({'q': query, 'format': 'json'})

    # fetch results
    url = '%s?%s' % (YQL_PUBLIC, query_str)
    result = urlopen(url)

    # parse json and return
    return json.load(result)['query']['results']

if __name__=='__main__':

    if len(sys.argv) == 3:
        # take tags and number of images from command line
        tags = sys.argv[1]
        n = int(sys.argv[2])
    else:
        # default to 500 pictures tagged with 'vivid'
        tags = 'vivid'
        n = 500

    # grab the top-n most interesting photos tagged with 'tags'
    query = '''select * from flickr.photos.search(%d) where tags="%s" and sort="interestingness-desc" and api_key="fa506cef10772542a871ec26351defbd"''' % (n, tags)

#    query='''select * from flickr.photos.search where has_geo="true" and text="san francisco" and api_key="fa506cef10772542a871ec26351defbd"'''

    # make yql call
    print "fetching %d photos tagged with %s from flickr" % (n, tags)
    results = yql_public(query)

    # create output directory if it doesn't exist
    directory = 'flickr_%s' % tags
    if not os.path.exists(directory):
        print "creating directory %s" % directory
        os.mkdir(directory)

    # run over results
    print "downloading %d results" % len(results['photo'])
    for photo in results['photo']:
        # build url of square image
        square_url = photo_url(photo)

        # download square image
        fname = '%s/%s.jpg' % (directory, photo['id'])
        if not os.path.exists(fname):
            print square_url , "->" , fname
            urlretrieve(square_url, filename=fname)
