$filename = shift @ARGV;
$challenge_name = shift @ARGV;
$file_ext = ".txt";
$filedir = "prompt_lists/";
$catlistsize = 100;

%list_names;
%lists;
$list_num = 1;

open FILE, $filename or die $!;

while (<FILE>) {
    $subfile = $_;
    chomp ($subfile);
    $subfilename = $filedir . $subfile . $file_ext;
    print ("reading $subfilename\n");
    open PROMPT_FILE, $subfilename or die $!;
    my @raw_list = <PROMPT_FILE>;
    $listname = @raw_list[0];
    chomp ($listname);
    $list_names{$list_num} = $listname;
    shift (@raw_list);
    
    my @list;
    foreach my $raw_prompt (@raw_list) {
        if ($raw_prompt =~ /\d*\. (.*)/) {
            $prompt = $1;
            if ($prompt =~ /(.*)--- exc: (.*)/) {
                unless ($2 =~ /$challenge_name/) {
                    push @list, $1;
                }
            } elsif ($prompt =~ /(.*)--- only: (.*)/){
                if ($2 eq $challenge_name) {
                    push @list, $1;
                }
            } else {
                push @list, $prompt;
            }
        }
    }
    
    while (@list > $catlistsize) {
        $index = @list;
        $remove = int(rand($index));
        splice(@list, $remove, 1);
    }
    
    $lists{$list_num} = \@list;
    
    $list_num++;
}

close(FILE);

$perl_output = $challenge_name . "perl.txt";
$post_output = $challenge_name . "post.txt";

open PERLFILE, ">", $perl_output;
open POSTFILE, ">", $post_output;

$list_num = 1;

foreach (keys %list_names) {
    print POSTFILE "<b>$list_num. $list_names{$_}</b>\n";
    print PERLFILE "\@list$list_num = (";
    
    $prompt_num = 1;
    $perlstring = "";
    foreach my $prompt (@{$lists{$_}}) {
        print POSTFILE "$prompt_num. $prompt\n";
        $perlstring = $perlstring . "\"$prompt\", ";
        $prompt_num++;
    }
    chop( $perlstring);
    chop ($perlstring);
    print PERLFILE $perlstring;
    print PERLFILE ");\n\n";
    print PERLFILE "\$categories\{$list_num\} = \\\@list$list_num;\n\n";
    
    
    print POSTFILE "\n";
    $list_num++;
}

close PERLFILE;
close POSTFILE;

